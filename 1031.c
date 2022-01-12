#include <stdio.h>

int TmpSum(int *arr, int start,int len){
    int sum = 0;
    for (int i=start;i<start+len;i++){
        sum += arr[i];
    }
    return sum;
}

int main(int argv, char *args[])
{
    //int A[] = {0, 6, 5, 2, 2, 5, 1, 9, 4};
    int A[] = {3,8,1,3,2,1,8,9,0};
    int L = 3;
    int M = 2;

    int first = 0;
    int second = 0;
    if (L > M)
    {
        first = M;
        second = L;
    } else
    {
        first = L;
        second = M;
    }

    int tmp = 0;
    int tmp2 = 0;
    int tmp3 = 0;
    int sum = 0;
    int loc = 0;
    for (int i = 0; i < 9; i++)
    {   if (i+first>9) break;
        sum = TmpSum(A,i,first);
        if (tmp < sum) {
            loc = i;
            tmp = sum;
        }
    }
    printf("%d,%d",tmp,loc);
    printf("\n");

    for (int i = 0; i < loc; i++)
    {   if (i+second>loc) break;
        sum = TmpSum(A,i,second);
        if (tmp2 < sum) {
            tmp2 = sum;
        }
    }
    printf("%d",tmp2);
    printf("\n");

    for (int i = loc+first; i < 9; i++)
    {   if (i+second>9) break;
        sum = TmpSum(A,i,second);
        if (tmp3 < sum) {
            tmp3 = sum;
        }
    }
    printf("%d",tmp3);
    printf("\n");

    if (tmp2<tmp3){
        tmp2=tmp3;
    }

    printf("%d",tmp+tmp2);

    return 0;
}