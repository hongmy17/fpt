#include <stdio.h>
#include <string.h>
#include <windows.h>

void chucNang1() {
	system("cls");
	float dtb;
	do {
		printf("Moi nhap diem trung binh: ");
		scanf("%f", &dtb);
	} while (dtb < 0 || dtb > 10);
	
	if (dtb >= 8) printf("Gioi\n");
	else if (dtb >= 6.5) printf("Kha\n");
	else if (dtb >= 5) printf("Trung binh\n");
	else printf("Yeu\n");
}

void chucNang2() {
	system("cls");
	int n;
	printf("Moi nhap so phan tu cua mang: ");
	scanf("%d", &n);
	
	int a[n];
	for (int i = 0; i < n; i++) {
		printf("a[%d]: ", i);
		scanf("%d", &a[i]);
	}
	
	printf("Cac so chan trong mang la: ");
	for (int i = 0; i < n; i++) {
		if (a[i] % 2 == 0) {
			printf("%d ", a[i]);
		}
	}
	
	int diem = 0;
	for (int i = 0; i < n; i++) {
		if (a[i] > 0) diem++;
	}
	
	printf("\nSo luong so nguyen duong trong mang la: %d\n", diem);
}

void chucNang3() {
	system("cls");
	char str[100];
	fflush(stdin);
	printf("Moi nhap chuoi: ");
	gets(str);
	printf("Chuoi hoa: %s", strupr(str));
	
	int diem = 0, len = strlen(str);
	for (int i = 0; i < len; i++) {
		if (str[i] != ' ') diem++;
	}
	
	printf("\nSo luong ky tu cua chuoi la: %d\n", diem);
}

int main() {
	char chucNang;
	system("cls");
	
	printf("=====MSSV: LINHPQPC05353_TEST FINAL_DE 1=====\n");
	printf("\t1. Bai1: Chuong trinh so nguyen\n");
	printf("\t2. Bai2: Mang 1 chieu\n");
	printf("\t3. Bai3: Chuoi\n");
	
	do {
		printf("Moi ban chon chuc nang(nhan phim 1, 2 hoac 3), nhan phim 5 de thoat: ");
		scanf("%d", &chucNang);
	} while (chucNang < 1 || chucNang > 5 || chucNang == 4);
	
	if (chucNang == 1) chucNang1();
	else if (chucNang == 2) chucNang2();
	else if (chucNang == 3) chucNang3();
	else return 0;
	
	do {
		printf("Nhan phim 4 de tiep tuc, phim 5 de thoat chuong trinh: ");
		scanf("%d", &chucNang);
	} while (chucNang < 4 || chucNang > 5);
	
	if (chucNang == 4) main();
	return 0;
}
