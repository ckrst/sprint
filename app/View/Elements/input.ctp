<?php
//Nome do campo no banco de dados
if (!isset($field)) {
    throw new IllegalArgumentException('O parâmetro field é obrigatório.');
}
if (!isset($model)) {
    throw new IllegalArgumentException('O parâmetro model é obrigatório.');
}

//Indica se o campo é somente leitura (adicionada atributo readonly no input)
$readonly = isset($readonly) ? $readonly : false;
//Tamanho máximo de caracteres do input (adiciona atributo maxlength no input)
$maxLength = isset($maxLength) ? $maxLength : false;
//Explicação do campo (string, exibe popover no lado direito do campo ao selecioná-lo)
$exp = isset($exp) ? $exp : '';
//Indica se o select aceita multíplas seleções (apenas para tipo select)
$multiple = isset($multiple) ? $multiple : false;
//Ícone para adicionar ao append/preppend do input (ver http://twitter.github.io/bootstrap/base-css.html#forms)
$inputIcon = isset($inputIcon) ? $inputIcon : '';
//Texto para adicionar ao append/preppend do input (ver http://twitter.github.io/bootstrap/base-css.html#forms)
$inputText = isset($inputText) ? $inputText : '';
//Localização do append/preppend do input (ver http://twitter.github.io/bootstrap/base-css.html#forms)
//Valores possíveis: 'before' ou 'after'
$inputLocation = isset($inputLocation) ? $inputLocation : '';
//Classes adicionais que podem ser adicionadas no input/select
$inputClass = isset($inputClass) ? $inputClass : '';
//Valor padrão do campo
$default = isset($default) ? $default : '';
//Tamanho do campo select
$size = isset($size) ? $size : 3;
//Atributo value do input/select 
$value = isset($value) ? $value : null;
//Atributo title do input/select
$title = isset($title) ? $title : '';
//Formato do campo. Possibilidades: enum, select, password, color, file, bool, perc, date, time, 
//datetime, money, decimal, cep, p_integer (inteiro positivo), integer, cpf, cnpj, 
//fone (em branco indica texto), password_p_integer (inteiro positivo)
$format = isset($format) ? $format : '';
//Atributo name do input/select
$name = isset($name) ? $name : $field;
//Informação que pode ser exibida ao lado do campo em fonte azul (interessante para checkboxes, onde o popover não funciona)
$info = isset($info) ? $info : '';
//Label do campo (texto exibido antes do campo)
$label = isset($label) ? $label : '';
//Array de opções para o campo (se format for select, é um array associativo, onde a chave é o valor enviado, e o valor do array é a descrição)
//Ex.: array(1=>'Item 1', 2=>'Item 2')
$selectOptions = isset($selectOptions) ? $selectOptions : null;

$this->Form->inputDefaults(array(
    'label' => false,
    'div' => false,
    'class' => '',
    'error' => false)
);
//Se o parâmetro label não for passado, utiliza o field/name
$inputLabel = $label ? $label : Inflector::humanize(isset($field) ? $field : $name);
$bool = false;
$enum = false;
$usePlaceholder = isset($usePlaceholder) ? $usePlaceholder : false;

if ($format == 'bool') {
    $bool = true;
}
if ($format) {
    switch ($format) {
        case 'enum':
            $enum = true;
            break;
        case 'perc':
            if (!$inputLocation) {
                $inputLocation = 'after';
                $inputText = '%';
            }
            break;
        case 'money':
            if (!$inputLocation) {
                $inputLocation = 'before';
                $inputText = 'R$';
            }
            break;
        case 'date':
        case 'time':
            if (!$inputClass) {
                $inputClass .= 'input-small';
            }
        case 'datetime':
            if (!$inputClass) {
                $inputClass .= 'input-medium';
            }
            break;
    }
}

$inputClass .= ' ';

if ($format == 'decimal') {
    $inputClass .= 'decimal-mask';
} elseif ($format == 'money' || $format == 'perc' || $format == 'p_decimal') {
    $inputClass .='money-mask';
} elseif ($format == 'p_integer' || $format == 'password_p_integer') {
    $inputClass .='integer-mask';
} elseif ($format == 'cpf') {
    $inputClass .='cpf-mask';
} elseif ($format == 'cep') {
    $inputClass .='cep-mask';
} elseif ($format == 'fone' || $format == 'phone') {
    $inputClass .='phone-mask';
} elseif ($format == 'cnpj') {
    $inputClass .='cnpj-mask';
} elseif ($format == 'date') {
    $inputClass .='date-mask';
} elseif ($format == 'time') {
    $inputClass .='time-mask';
} elseif ($format == 'datetime') {
    $inputClass .='datetime-mask';
} elseif ($format == 'integer-sep') {
    $inputClass .='integer-separated-mask';
}
$inputClass .= ' ';
?>
<? if (!isset($controlGroup) && $field != 'id'): ?>
    <div class="control-group <?= $this->Form->isFieldError($field) ? 'error' : '' ?>" >
        <? if (!$usePlaceholder && $field != 'id') : ?>
            <label class="control-label" style="cursor: pointer" class="checkbox" for="<?= $field ?>"><?= $inputLabel ?></label>
        <? endif ?>
        <? if (!$usePlaceholder): ?>
            <div class="controls">
            <? endif ?>
        <? endif ?>
        <?
        if (isset($format) && ($format == 'password' || $format == 'password_p_integer')) {
            echo $this->Form->password($model . '.' . $field, array('value' => '', 'maxlength' => $maxLength, 'id' => $field, 'autocomplete' => 'off', 'class' => isset($inputClass) && $inputClass ? $inputClass : 'input-large'));
        } else {
            if (isset($inputLocation) && $inputLocation) {
                if ($inputLocation == 'before') {
                    echo '<div class="input-prepend">';
                    if ($inputIcon) {
                        echo "<span class=\"add-on\"><i class=\"$inputIcon\"></i></span>";
                    } else if ($inputText) {
                        echo "<span class=\"add-on\">$inputText</span>";
                    }
                }
            }

            //Se possui mascara
            if (isset($format) && $format) {
                //Já existe um valor para o campo
                if (isset($this->request->data[$model]) && isset($this->request->data[$model][$field])) {
                    switch ($format) {
                        case 'date':
                            $date = DateTime::createFromFormat('Y-m-d', $this->request->data[$model][$field]);
                            if ($date) {
                                $value = $date->format('d/m/Y');
                            }
                            break;
                        case 'datetime':
                            break;
                    }
                }
                //Criação, seta valor padrão se for especificado
                else if (isset($default) && $default) {
                    if (isset($this->request->data[$model])) {
                        if ($default == 'now') {
                            $default = new date('d/m/Y H:i:s');
                        } else if ($default == 'current_date') {
                            $default = new date('d/m/Y');
                        } else if ($default == 'current_time') {
                            $default = new date('H:i:s');
                        }
                        $this->request->data[$model][$field] = $default;
                    }
                }
            }

            $type = null;
            $options = null;
            if (isset($format) && $format) {
                switch ($format) {
                    case 'select':
                        $type = 'select';
                        $options = $selectOptions;
                        break;
                    case 'enum';
                        $type = 'select';
                        $n = "{$model}_{$field}_options";
                        $options = isset($$n) ? $$n : null;
                        break;
                    case 'password':
                        $type = 'password';
                        break;
                    case 'bool':
                        $type = 'checkbox';
                        break;
                    case 'file':
                        $type = 'file';
                        break;
                    case 'password_p_integer':
                        $type = 'password';
                        break;
                    default:
                        $type = 'text';
                }
            }

            if (!isset($maxLength)) {
                $maxLength = '';
            }
            if ($readonly) {
                echo $this->Form->input($model . '.' . $field, array(
                    'maxlength' => $maxLength,
                    'id' => $field,
                    'value' => $value,
                    'type' => $type,
                    'title' => $title,
                    'options' => $options,
                    'readonly' => 'readonly',
                    'class' => isset($inputClass) && $inputClass ? $inputClass : 'input-xlarge',
                    'placeholder' => $usePlaceholder ? $inputLabel : ''));
            } else {
                $inputOptions = array(
                    'maxlength' => $maxLength,
                    'id' => $field,
                    'type' => $type,
                    'title' => $title,
                    'options' => $options,
                    'class' => isset($inputClass) && $inputClass ? $inputClass : 'input-xlarge',
                    'placeholder' => $usePlaceholder ? $inputLabel : '');
                if ($multiple) {
                    $inputOptions['multiple'] = true;
                    $inputOptions['size'] = $size;
                } else {
                    $inputOptions['value'] = $value;
                }


                echo $this->Form->input($model . '.' . $field, $inputOptions);

                if ($multiple && is_array($value)) {
                    ?>
                    <script type="text/javascript">
            <? foreach ($value as $id): ?>
                            $('#<?= $field ?> > option[value="<?= $id ?>"]').attr('selected', true);
            <? endforeach ?>
                    </script>
                    <?
                }
            }
            if (isset($inputLocation) && $inputLocation) {
                if ($inputLocation == 'after') {
                    ?><div class="input-append"><?
                    if ($inputIcon) {
                        ?><span class="add-on"><i class="<?= $inputIcon ?>"></i></span><?
                        } else if ($inputText) {
                            ?><span class="add-on"><?= $inputText ?></span><?
                            }
                        }
                    }
                }
                if (isset($inputLocation) && $inputLocation) {
                    ?></div><?
        }
        ?>
        <? if (isset($info) && $info != ''): ?>
            <span style="margin-top: 3px" class="info help-inline"><?= $info ?></span>
        <? endif ?>
        <span class="help-inline"><?= $this->Form->error($model . '.' . $field) ?></span>
        <? if (isset($exp) && $exp): ?>
            <script type="text/javascript">
                $('#<?= $field ?>').popover({'title': '<?= $inputLabel ?>', 'content': '<?= $exp ?>'});
                $('#<?= $field ?>').blur(function() {
                    $('#<?= $field ?>').popover('hide')
                });
                $('#<?= $field ?>').focus(function() {
                    $('#<?= $field ?>').popover('show')
                });
                $('#<?= $field ?>').unbind('click');
            </script>
        <? endif ?>
        <? if (isset($format) && $format): ?>
            <script type="text/javascript">

    <? if ($format == 'color'): ?>
                    var change = function(hex) {
                        var tmp = parseInt(hex.substr(1), 16);
                        var inv = tmp > 0x808080 ? 0x111111 : 0xFFFFFF;
                        inv = '#' + inv.toString(16);
                        $('#<?= $field ?>').css('background-color', hex).val(hex);
                        $('#<?= $field ?>').css('color', inv);
                    };
                    $('#<?= $field ?>').colorpicker().on('changeColor', function(ev) {
                        var hex = ev.color.toHex();
                        change(hex);
                    });
                    change($('#<?= $field ?>').val());
    <? endif; ?>
            </script>
        <? endif ?>
        <? if (!isset($controlGroup) && $field != 'id'): ?>
        </div>
        <? if (!$usePlaceholder): ?>
        </div>
    <? endif ?>
    <? endif?>