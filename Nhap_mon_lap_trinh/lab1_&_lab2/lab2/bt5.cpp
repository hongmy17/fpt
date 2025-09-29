/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main() 
{
	int ngay, thang, nam;
	printf("Moi nhap ngay: ");
	scanf("%d", &ngay);
	printf("Moi nhap thang: ");
	scanf("%d", &thang);
	printf("Moi nhap nam: ");
	scanf("%d", &nam);
	printf("%d/%d/%d\n", ngay, thang, nam % 100);
	return 0;
}
