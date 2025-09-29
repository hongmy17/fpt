/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main()
{
	float toan, ly, hoa, hesotoan = 3, hesoly = 2, hesohoa = 1;
	printf("Moi nhap diem toan: ");
	scanf("%f", &toan);
	printf("Moi nhap diem ly: ");
	scanf("%f", &ly);
	printf("Moi nhap diem hoa: ");
	scanf("%f", &hoa);
	printf("Diem trung binh la: %f\n", ((toan * hesotoan) + (ly * hesoly) + (hoa * hesohoa)) / (hesotoan + hesoly + hesohoa));
	return 0;
}
