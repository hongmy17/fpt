#include <stdio.h>
#include <string.h>

struct sinhvien {
	char mssv[50];
	char hoten[50];
	char nganhhoc[50];
	float diemTB;
} sv[50];

int main() {
	int n, i;
	printf("Nhap so luong sinh vien n= ");
	scanf("%d", &n);
	
	for (i = 0; i < n; i++) {
		fflush(stdin);
		printf("Nhap thong tin sinh vien %d:\n", i);
		printf("MSSV: ");
		gets(sv[i].mssv);
		
		printf("Ten: ");
		gets(sv[i].hoten);
		
		printf("Nganh hoc: ");
		gets(sv[i].nganhhoc);
		
		printf("Diem TB: ");
		scanf("%d", &sv[i].diemTB);
	}
	
	for (i = 0; i < n; i++) {
		printf("Thong tin sinh vien thu %d:\n", i);
		printf("MSSV: %s\n", sv[i].mssv);
		printf("Ten: %s\n", sv[i].hoten);
		printf("Nghanh hoc: %s\n", sv[i].nganhhoc);
		printf("Diem TB: %f\n", sv[i].diemTB);
	}
	return 0;
}
