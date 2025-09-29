/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main() {
	float diem1, diem2, diem3, diemGiuaKy, diemCuoiKy;
	printf("Moi nhap diem kiem tra 1: ");
	scanf("%f", &diem1);
	printf("Moi nhap diem kiem tra 2: ");
	scanf("%f", &diem2);
	printf("Moi nhap diem kiem tra 3: ");
	scanf("%f", &diem3);
	printf("Moi nhap diem kiem tra giua ky: ");
	scanf("%f", &diemGiuaKy);
	printf("Moi nhap diem kiem tra cuoi ky: ");
	scanf("%f", &diemCuoiKy);
	
	printf("Tong diem kiem tra la: %g\n", diem1 + diem2 + diem3);
	printf("Diem thi giua ky la: %g\n", diemGiuaKy);
	printf("Diem thi cuoi ky la: %g\n", diemCuoiKy);
	printf("Tong diem la: %g", diem1 + diem2 + diem3 + diemGiuaKy + diemCuoiKy);
	return 0;
}
