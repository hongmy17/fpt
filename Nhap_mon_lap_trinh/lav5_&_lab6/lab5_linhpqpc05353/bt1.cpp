/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int checkMax(int a, int b, int c) {
    int x, max ;
    if (a > b) x = a;
    else x = b;
    if (x > c) max = x;
    else max = c;
    return max;
}

int main() {
	int a, b, c;
	printf("Moi nhap a: ");
	scanf("%d", &a);
	printf("Moi nhap b: ");
	scanf("%d", &b);
	printf("Moi nhap c: ");
	scanf("%d", &c);
	printf("So lon nhat trong 3 so %d, %d va %d la %d\n", a, b, c, checkMax(a, b, c));
	return 0;
}

