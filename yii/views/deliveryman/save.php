<?php
    use yii\widgets\ActiveForm;

    echo '<div class="border-side-bottom content content-large">';
        $form = ActiveForm::begin(viewOption([],'form'));
            echo $form->field($model, 'status')->radioList(dropDownList('status'));
            echo $form->field($model, 'company_id')->dropDownList($model->arrayListModel(\app\models\Company::class),['prompt'=>t('select')]);
            echo $form->field($model, 'name')->textInput(['maxlength' => true]);
            echo $form->field($model, 'cpf')
                ->widget(\yii\widgets\MaskedInput::class, ['mask' => '999.999.999-99']);
            echo $form->field($model, 'rg')->textInput(['maxlength' => true]);
            echo $form->field($model, 'cellphone')
                ->widget(\yii\widgets\MaskedInput::class, ['mask' => '(99) 99999999[9]']);
            echo $form->field($model, 'salary_type')
                ->dropDownList(dropDownList("salaryType"),['prompt'=>t('select')]);
            echo $form->field($model, 'salary_value')->widget(\kartik\money\MaskMoney::class, Yii::$app->params["maskMoneyOptions"]);

            echo \app\widgets\MyButtons::widget(["model" => $model]);
        ActiveForm::end();
    echo '</div>';
$this->registerJs('
$(document).ready(function(){
    $("form").on("submit", function(e)
    {
        $("input").trigger("blur");
    });
});');