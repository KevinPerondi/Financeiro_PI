#include<stdio.h>

int main(void){
	int a,b;
	printf("peso,altura");
	scanf("%d,%d",&a,&b);
	int c = a/(b*b);
	printf("IMC: %d",c);
return 0;
}
