#include <stdio.h>

void tinhTong() {
	int a, b, tong = 0;
	printf("Moi nhap a: ");
	scanf("%d", &a);
	printf("Moi nhap b: ");
	scanf("%d", &b);
	tong  = a + b;
	printf("Tong cua a va b la: %d\n", tong);
}

int tinhTong2(int a, int b) {
	return a + b;
}

int main() {
	int a, b, tong;
	printf("Moi nhap a: ");
	scanf("%d", &a);
	printf("Moi nhap b: ");
	scanf("%d", &b);
	
	tong = tinhTong2(a, b);
	int tong2 = tinhTong2(8, 6);
	int tong3 = tinhTong2(9, 6);
	
	printf("%d\n", tong);
	printf("%d\n", tong2);
	printf("%d\n", tong3);
	return 0;
}
