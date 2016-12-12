/*线性表顺序存储
 *2016年12月5日11:51:16
 *@hurace
 * */

#include <stdio.h>

#include <stdlib.h>
//#include <io.h>
#include <math.h>
#include <time.h>

#define OK 1
#define ERROR 0
#define TRUE 1
#define FALSE 0

#define MAXSIZE 20 /*存储空间初始分配量*/

typedef int Status; /*Status是函数的类型,其值是函数结果状态代码，如OK等*/
typedef int ElemType;/* ElemType类型根据实际情况而定，这里假设为int */

typedef struct List
{
	ElemType data[MAXSIZE];/* 数组，存储数据元素 */
	int length;/* 线性表当前长度 */
}SqList;

Status visit(ElemType e)
{
	printf("%d ", e);
	return OK;
}

/* 初始化顺序线性表 */
Status InitList(SqList * L)
{
	L->length = 0;
	return OK;
}

/* 初始条件：顺序线性表L已存在,1≤i≤ListLength(L)， */
/* 操作结果：在L中第i个位置之前插入新的数据元素e，L的长度加1 */
Status ListInsert(SqList * L, int i, ElemType e)
{
	int k;
	if(i < 0 || i > L->length+1)/* 当i比第一位置小或者比最后一位置后一位置还要大时 */
		return ERROR;
	if(MAXSIZE == L->length)/* 顺序线性表已经满 */
		return ERROR;
	
	if(i <= L->length){ /* 若插入数据位置不在表尾 */
		for(k=L->length - 1;k >= i;--k){/* 将要插入位置之后的数据元素向后移动一位 */
			L->data[k+1] = L->data[k];
		}	
	}
	L->data[i-1] = e;
	L->length++;
	return OK;
}

/* 初始条件：顺序线性表L已存在 */
/* 操作结果：依次对L的每个数据元素输出 */
Status ListTraverse(SqList * L)
{
	int i;
	for(i = 0;i<L->length;++i)
		visit(L->data[i]);
	printf("\n");
	return OK;
}

/* 初始条件：顺序线性表L已存在。操作结果：若L为空表，则返回TRUE，否则返回FALSE */
Status ListEmpty(SqList * L)
{ 
	if(0 == L->length)
		return TRUE;
	else
		return FALSE;
}

/* 初始条件：顺序线性表L已存在，1≤i≤ListLength(L) */
/* 操作结果：删除L的第i个数据元素，并用e返回其值，L的长度减1 */
Status ListDelete(SqList * L, int i, ElemType * e)
{
	int k;
	if(0 == L->length)
		return ERROR;
	if(i < 0 || i > L->length)
		return ERROR;
	*e = L->data[i-1];
	if(i < L->length){
		for(k=i;k<L->length;++K){
			L->data[k-1] = L->data[k];
		}
	}
	L->length--;
	return OK;
}

int main(void)
{
	SqList L;
	InitList(&L);
	printf("初始化L后:L.length=%d\n", L.length);

	ListInsert(&L, 1, 12);
	ListInsert(&L, 2, 13);
	ListInsert(&L, 3, 14);
	ListInsert(&L, 4, 15);
	ListInsert(&L, 5, 11);
	
	ListTraverse(&L);

	return 0;
}
