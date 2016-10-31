<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-31
 * Time: 12:30
 */
namespace DesignPatterns\Chapter18\Program1;

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

class Program{
    public static function main(){
        //大战Boss前
        $lixiaoyao = new GameRole();
        $lixiaoyao->GetInitState();
        $lixiaoyao->StateDisplay();

        //保存进度
        $backup = new GameRole();
        $backup->setVit($lixiaoyao->getVit());
        $backup->setAtk($lixiaoyao->getAtk());
        $backup->setDef($lixiaoyao->getDef());

        //大战Boss时，损耗严重
        $lixiaoyao->Fight();
        $lixiaoyao->StateDisplay();

        //恢复之前的状态
        $lixiaoyao->setVit($backup->getVit());
        $lixiaoyao->setAtk($backup->getAtk());
        $lixiaoyao->setDef($backup->getDef());

        $lixiaoyao->StateDisplay();
    }
}

Program::main();