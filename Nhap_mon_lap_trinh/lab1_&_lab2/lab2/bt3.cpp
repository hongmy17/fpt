/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main()
{
	float pi = 3.14, r, chuVi, dienTich;
	printf("Moi nhap ban kinh r: ");
	scanf("%f", &r);
	chuVi = 2 * pi * r;
	dienTich = pi * r * r;
	printf("Chu vi la: %f\n", chuVi);
	printf("Dien tich la: %f\n", dienTich);
	return 0;
}
