/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main()
{
	int a, b, chuVi, dienTich;
	printf("Moi nhap a: ");
	scanf("%d", &a);
	printf("Moi nhap b: ");
	scanf("%d", &b);
	chuVi = (a + b) / 2;
	dienTich = a * b;
	printf("Chu vi la: %d\n", chuVi);
	printf("Dien tich la: %d\n", dienTich);
	return 0;
}
