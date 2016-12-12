#include <stdio.h>

int findPos(int * a, int L, int R)
{
	int base = *(a+L);
	int bL = L;
	int tmp;
	while(L != R){
		while(L < R){
			if(*(a+R) < base)
				break;
			--R;
		}

		while(L < R){
			if(*(a+L) > base)
				break;
			++L;
		}
		if( L < R){
			tmp = *(a+R);
			*(a+R) = *(a+L);
			*(a+L) = tmp;
		}
	}
	*(a+bL) = *(a+L);
	*(a+L) = base;
	return L;
}

void quickSort(int * a, int L, int R)
{
	int pos;
	if(L < R){
		pos = findPos(a, L, R);
		quickSort(a, L, pos-1);
		quickSort(a, pos+1, R);
	}
	return;
}

int main(void)
{
	int a[10] = {10, 9, 20, 18, 30, 16, 23, 32, 90, 67};
	int i;

	quickSort(a, 0, 9);

	for(i = 0;i<10;++i)
		printf("%d ",a[i]);
	printf("\n");

	return 0;
}
