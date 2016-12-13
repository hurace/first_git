#include <stdio.h>

/*
 *　每一趟从待排序的数据元素中选出最小（或最大）的一个元素，顺序放在已排好序的数列的最后，直到全部待排序的数据元素排完。
 * **/
int main(void)
{
	int arr[7] = {12, 23, 45, -9, 89, 76, 5};
	int i, j, k, tmp, min, t;
	for(i = 0;i < 7;++i){
		min = arr[i];
		t = i;
		for(j = i+1;j < 7;++j){
			if(min > arr[j]){
				min = arr[j]; 
				t = j;
			}
		}
		arr[t] = arr[i];
		arr[i] = min;
	}
	
	for(k = 0;k < 7;++k)
		printf("%d,", arr[k]);
	printf("\n");

	return 0;
}
