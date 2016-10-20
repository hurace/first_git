<?php
/**
 * Created by PhpStorm.
 * User: hua
 * Date: 2016-10-20
 * Time: 17:25
 */
namespace DesignPatterns\Chapter10\Program1;

//学生甲抄的试卷
class TestPaperA{
    //试题1
    public function TestQuestion1(){
        echo ' 杨过得到，后来给了郭靖，炼成倚天剑、屠龙刀的玄铁可能是[ ] a.球磨铸铁 b.马口铁 c.高速合金钢 d.碳素纤维 ',PHP_EOL;
        echo '答案：b',PHP_EOL;
    }

    //试题2
    public function TestQuestion2(){
        echo '杨过、程英、陆无双铲除了情花，造成[ ] a.使这种植物不再害人 b.使一种珍稀物种灭绝 c.破坏了那个生物圈的生态平衡 d.造成该地区沙漠化  ',PHP_EOL;
        echo '答案：a',PHP_EOL;
    }

    //试题3
    public function TestQuestion3(){
        echo ' 蓝凤凰的致使华山师徒、桃谷六仙呕吐不止,如果你是大夫,会给他们开什么药[ ] a.阿司匹林 b.牛黄解毒片 c.氟哌酸 d.让他们喝大量的生牛奶 e.以上全不对   ',PHP_EOL;
        echo '答案：c',PHP_EOL;
    }
}

//学生乙抄的试卷
class TestPaperB{
    //试题1
    public function TestQuestion1(){
        echo ' 杨过得到，后来给了郭靖，炼成倚天剑、屠龙刀的玄铁可能是[ ] a.球磨铸铁 b.马口铁 c.高速合金钢 d.碳素纤维 ',PHP_EOL;
        echo '答案：d',PHP_EOL;
    }

    //试题1
    public function TestQuestion2(){
        echo ' 杨过、程英、陆无双铲除了情花，造成[ ] a.使这种植物不再害人 b.使一种珍稀物种灭绝 c.破坏了那个生物圈的生态平衡 d.造成该地区沙漠化  ',PHP_EOL;
        echo '答案：b',PHP_EOL;
    }

    //试题1
    public function TestQuestion3(){
        echo ' 蓝凤凰的致使华山师徒、桃谷六仙呕吐不止,如果你是大夫,会给他们开什么药[ ] a.阿司匹林 b.牛黄解毒片 c.氟哌酸 d.让他们喝大量的生牛奶 e.以上全不对   ',PHP_EOL;
        echo '答案：a',PHP_EOL;
    }
}

class Program{
    public static function main(){
        echo '学生甲抄的试卷：',PHP_EOL;
        $studentA = new TestPaperA();
        $studentA->TestQuestion1();
        $studentA->TestQuestion2();
        $studentA->TestQuestion3();

        echo '学生乙抄的试卷：',PHP_EOL;
        $studentB = new TestPaperB();
        $studentB->TestQuestion1();
        $studentB->TestQuestion2();
        $studentB->TestQuestion3();
    }
}

Program::main();