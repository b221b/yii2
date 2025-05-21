<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competition_applications".
 *
 * @property int $id
 * @property int $user_id
 * @property int $competition_id
 * @property string $status
 * @property string $created_at
 * @property string $processed_at
 * @property int $processed_by
 *
 * @property Competitions $competition
 * @property User $user
 * @property User $processedBy
 */
class CompetitionApplications extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';

    public static function tableName()
    {
        return 'competition_applications';
    }

    public function rules()
    {
        return [
            [['user_id', 'competition_id'], 'required'],
            [['user_id', 'competition_id', 'processed_by'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'processed_at'], 'safe'],
            [['competition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Competitions::className(), 'targetAttribute' => ['competition_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['processed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['processed_by' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'competition_id' => 'Competition ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'processed_at' => 'Processed At',
            'processed_by' => 'Processed By',
        ];
    }

    public function getCompetition()
    {
        return $this->hasOne(Competitions::className(), ['id' => 'competition_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getProcessedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'processed_by']);
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->status = self::STATUS_PENDING;
            $this->created_at = date('Y-m-d H:i:s');
        }

        if ($this->isAttributeChanged('status')) {
            $this->processed_at = date('Y-m-d H:i:s');
            $this->processed_by = Yii::$app->user->id;
        }

        return parent::beforeSave($insert);
    }

    public function approve()
    {
        // Проверяем, не зарегистрирован ли уже пользователь
        $existingRegistration = CompetitionRegistration::find()
            ->where([
                'competition_id' => $this->competition_id,
                'user_id' => $this->user_id
            ])
            ->exists();

        if ($existingRegistration) {
            throw new \Exception('Пользователь уже зарегистрирован на это соревнование');
        }

        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->status = self::STATUS_APPROVED;
            $this->processed_at = date('Y-m-d H:i:s');
            $this->processed_by = Yii::$app->user->id;

            if (!$this->save()) {
                throw new \Exception('Не удалось обновить заявку');
            }

            // Создаем запись о регистрации
            $registration = new \app\models\CompetitionRegistration();
            $registration->competition_id = $this->competition_id;
            $registration->user_id = $this->user_id;
            $registration->registration_date = date('Y-m-d H:i:s');

            if (!$registration->save()) {
                throw new \Exception('Не удалось создать запись о регистрации');
            }

            $transaction->commit();
            return true;
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::error($e->getMessage());
            return false;
        }
    }
}
