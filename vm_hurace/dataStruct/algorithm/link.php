<?php  
            //先构建一个环形链表，链表上的每个节点，表示一个小朋友  
            //小孩类  
            class Child{  
                public $no;  
                public $next=null;  
                //构造函数  
                public function __construct($no){  
                    $this->no=$no;  
                }  
            }  
            //定义一个指向第一个小朋友的引用  
            //定义一个空头  
            $first=null;  
            $n=10; //$n表示有几个小朋友  
            //写一个函数来创建一个四个小朋友的环形链表  
            /* 
             addChild函数的作用是：把$n个小孩在构建成一个环形链表，$first变量就指向该环形链表的第一个小孩子 
             */  
            function addChild(&$first,$n){ //此处要加地址符  
                //1.头结点不能动 $first不能动  
                $cur=$first;  
                for($i=0;$i<$n;$i++){  
                    $child=new Child($i+1); //为什么要加1，因为for循环中i是从开始的，但是小朋友的编号是从1开始的  
                    //怎么构成一个环形链表呢  
                    if($i==0){ //第一个小孩的情况  
                        $first=$child; //让first指向child，但是还没有构建环形链表  
                        $first->next=$child; //自己指向自己  
                        $cur=$first;  
                    }else{  
                        $cur->next=$child;  
                        $child->next=$first;  
                        //继续指向下一个  
                        $cur=$cur->next;  
                    }  
                }  
            }  
            //遍历所有的小孩，并显示  
            function showChild($first){  
                //遍历 cur变量是帮助我们遍历循环列表的，所以不能动  
                $cur=$first;  
                while($cur->next!=$first){ //cur没有到结尾，就遍历  
                    //显示  
                    echo'<br/>小孩的编号是'.$cur->no;  
                    //继续  
                    $cur=$cur->next;  
                }  
                //当退出while循环时，已经到了环形链表的最后，即cur此时指向最后一个小孩，所以还要处里一下最后这个小孩节点  
                echo'<br/>小孩的编号是'.$cur->no;  
            }  
  
            //为了能够删除某个小孩，我们需要一个辅助变量，该变量指向的小孩在$first前面，在$first的前面，因为是环形的，就相当于在队尾了。  
            $m=3;  
            $k=2;  
            function countChild($first,$m,$k){  
                $tail=$first;  
                while($tail->next!=$first){  
                    $tail=$tail->next;  
                }  
  
                //考虑是从第几个人开始数的问题，变量k  
                //首先要定位  
                //因为动一下，就相当于数了两下，算上自己了，所以k-1  
                for($i=0;$i<$k-1;$i++){  
                    $tail=$tail->next;  
                    $first=$first->next;  
                }  
  
                //当退出while时，我们的$tail就指向了最后这个小孩  
  
                //让$first和$tail向后移动  
                //移一下就相当于数了两下，因为还要数自己一下  
                //如从1号小朋友到2号小朋友，只移动了一下，那么是1号小朋友数1 再数2，因为还数了自己一下。  
                //移动2次，相当于数了3下，因为自己数的时候，自己不需要动  
                //移动m-1次，相当于数了m下   
                while($tail!=$first){ //当$tail==$first则说明只有最后一个人了  
                    for($i=0;$i<$m-1;$i++){  
                        $tail=$tail->next;  
                        $first=$first->next;  
                    }  
                    //把$first指向的节点小孩删除环形链表  
                    //出列显示，应该在first没有改变之前先打印输出  
                    echo'<br/>出圈的人的编号是'.$first->no;  
                    $first=$first->next;  
                    $tail->next=$first;  
                }  
                echo'<br/>最后留在圈圈的人的编号是'.$tail->no;  
            }  
  
            addChild($first,$n);  
            showChild($first);  
  
            //真正来玩游戏  
            countChild($first,$m,$k);  
        ?>  