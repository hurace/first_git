<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-31
 * Time: 14:51
 */
namespace DesignPatterns\Chapter18\Program2;

class GameRole{
    //生命力
    private $_vit;
    public function setVit($vit){
        $this->_vit = $vit;
    }

    public function getVit(){
        return $this->_vit;
    }

    //攻击力
    private $_atk;
    public function setAtk($atk){
        $this->_atk = $atk;
    }

    public function getAtk(){
        return $this->_atk;
    }

    //防御力
    private $_def;
    public function setDef($def){
        $this->_def = $def;
    }

    public function getDef(){
        return $this->_def;
    }

    //状态显示
    public function StateDisplay(){
        echo '角色当前状态：',PHP_EOL;
        echo '体力：',$this->_vit,PHP_EOL;
        echo '攻击力：',$this->_atk,PHP_EOL;
        echo '防御力：',$this->_def,PHP_EOL;
    }

    //保存角色状态
    public function SaveState(){
        return new RoleStateMemento($this->_vit, $this->_atk, $this->_def);
    }

    //恢复角色状态
    public function RecorveryState(RoleStateMemento $memento){
        $this->_vit = $memento->getVit();
        $this->_atk = $memento->getAtk();
        $this->_def = $memento->getDef();
    }

    //获得初始状态
    public function GetInitState(){
        $this->_vit = 100;
        $this->_atk = 100;
        $this->_def = 100;
    }

    //战斗
    public function Fight(){
        $this->_vit = 0;
        $this->_atk = 0;
        $this->_def = 0;
    }
}

//角色状态存储箱
class RoleStateMemento{
    private $_vit;
    private $_atk;
    private $_def;

    public function __construct($vit, $atk, $def){
        $this->_vit = $vit;
        $this->_atk = $atk;
        $this->_def = $def;
    }

    //生命力
    public function setVit($vit){
        $this->_vit = $vit;
    }

    public function getVit(){
        return $this->_vit;
    }

    //攻击力
    public function setAtk($atk){
        $this->_atk = $atk;
    }

    public function getAtk(){
        return $this->_atk;
    }

    //防御力
    public function setDef($def){
        $this->_def = $def;
    }

    public function getDef(){
        return $this->_def;
    }
}

//角色状态管理者
class RoleStateCaretaker{
    private $_memento;

    public function setMemento($memento){
        $this->_memento = $memento;
    }

    public function getMemento(){
        return $this->_memento;
    }
}

class Program{
    public static function main(){
        //大战Boss前
        $lixiaoyao = new GameRole();
        $lixiaoyao->GetInitState();
        $lixiaoyao->StateDisplay();

        //保存进度
        $stateAdmin = new RoleStateCaretaker();
        $stateAdmin->setMemento($lixiaoyao->SaveState());

        //大战Boss时，损耗严重
        $lixiaoyao->Fight();
        $lixiaoyao->StateDisplay();

        //恢复之前状态
        $lixiaoyao->RecorveryState($stateAdmin->getMemento());
        $lixiaoyao->StateDisplay();
    }
}

Program::main();