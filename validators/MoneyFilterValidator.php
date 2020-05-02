<?php

    namespace nox\validators;

    use yii\validators\Validator;

    /**
     * Class MoneyFilterValidator
     *
     * @category Validator
     * @author   Jonatas Sas
     *
     * @package  common\components\validators
     */
    class MoneyFilterValidator extends Validator
    {
        /**
         * @var string
         */
        public string $thousands = '.';

        /**
         * @var string
         */
        public string $decimal = ',';

        /**
         * @var int
         */
        public int $precision = 2;

        /**
         * @inheritdoc
         */
        public function init()
        {
            parent::init();
        }

        /**
         * @inheritdoc
         */
        public function validateAttribute($model, $attribute)
        {
            $value = trim((string)$model->$attribute);

            $value = str_replace($this->thousands, '', $value);
            $value = str_replace($this->decimal, '.', $value);
            $value = preg_replace('/([^0-9.]+)/', '', (float)$value);

            $model->$attribute = $value;
        }

        /**
         * @inheritdoc
         */
        public function clientValidateAttribute($model, $attribute, $view)
        {
            return null;
        }
    }
