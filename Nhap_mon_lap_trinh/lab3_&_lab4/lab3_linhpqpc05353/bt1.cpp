/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main() {
	float dtb;
	printf("Moi nhap dtb: ");
	scanf("%f", &dtb);
	if (dtb >= 9) printf("Hoc luat xuat sac");
	else if (dtb >= 8) printf("Hoc luc gioi");
	else if (dtb >= 6.5) printf("Hoc luac kha");
	else if (dtb >= 5) printf("Hoc luc trung binh");
	else if (dtb >= 3.5) printf("Hoc luc yeu");
	else printf("Hoc luat kem");
	return 0;
}
