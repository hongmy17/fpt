/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int tinhTong(int n) {
    int tong = 0;
    for (int i = 1; i <= n; i++) tong += i;
    return tong;
}

int main() {
    int n;
    printf("Moi nhap n: ");
    scanf("%d", &n);
    printf("Tong cua cac so tu 1 toi %d la: %d\n", n, tinhTong(n));
    return 0;
}
