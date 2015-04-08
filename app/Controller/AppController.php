<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/**
     * Exibe uma mensagem de erro (vermelho)
     * @param type $erro
     */
    public function flashError($erro, $title = null) {
        //Seta uma variável no controller para que os testes possam 'saber' que esse método foi chamado
        $this->flashError = $erro;
        $this->Session->setFlash($erro, 'flash', array('title' => $title), 'error');
    }

    public function flashWarning($warning, $title = null) {
        $this->flashWarning = $warning;
        $this->Session->setFlash($warning, 'flash', array('title' => $title), 'warning');
    }

    /**
     * Exibe mensagem de sucesso (verde)
     * @param type $msg
     */
    public function flashSuccess($msg, $title = null) {
        //Seta uma variável no controller para que os testes possam 'saber' que esse método foi chamado
        $this->flashSuccess = $msg;
        if (!empty($title)) {
            $this->flashSuccessTitle = $title;
        }
        $this->Session->setFlash($msg, 'flash', array('title' => $title));
    }

    /**
     * Exibe mensagem de model salvo com sucesso
     * @deprecated 
     * @return type
     */
    public function saveSuccess() {
        return $this->flashSuccess(Inflector::humanize($this->model(false)) . __(' salvo(a) com sucesso!'));
    }

    /**
     * Exibe mensagem de model não salvo
     * @deprecated 
     * @return type
     */
    public function saveError() {
        return $this->flashError(__('Não foi possível salvar o(a) ') . strtolower(Inflector::humanize($this->model(false)) . '.'));
    }

    /**
     * Exibe mensagem de exclusão bem sucedida
     * @deprecated 
     * @return type
     */
    public function deleteSuccess() {
        return $this->flashSuccess(Inflector::humanize($this->model(false)) . __(' excluído(a) com sucesso!'));
    }

    /**
     * Exibe mensagem de erro durante a exclusão
     * @return type
     */
    public function deleteError() {
        return $this->flashError(__('Não foi possível excluir o(a) ') . Inflector::humanize($this->model(false) . '.'));
    }
    
}
