#include <stdio.h>
#include "max.h"

int main(void)
{
    int i, j;
    printf("Hello, World!\n"); 

    i = max(5, 3);   
    printf("max = %d\n", i);
	
    j = min(5, 3);
    printf("min = %d\n", j);
    return 0;
}
