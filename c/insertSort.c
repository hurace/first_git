#include <stdio.h>

int main(void)
{
	int arr[6] = {21, 89, 56, 9, 23, -7};
	int i, j, k, tmp;

	for(i = 1;i < 6;++i){
		if(arr[i] < arr[i-1]){//注意[0,i-1]都是有序的。如果待插入元素比arr[i-1]还大则无需再与[i-1]前面的元素进行比较了，反之则进入if语句
			tmp = arr[i];
			for(j = i-1;j >= 0 && arr[j] > tmp;--j){
				arr[j+1] = arr[j];//把比temp大或相等的元素全部往后移动一个位置
			}
			arr[j+1] = tmp;//把待排序的元素temp插入腾出位置的(j+1)
		}
	}

	for(k = 0;k < 6;++k)
		printf("%d,", arr[k]);

	return 0;
}
