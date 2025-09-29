#include <stdio.h>
int main() {
	int n, tong = 0, tich = 1;
	printf("Moi nhap n: ");
	scanf("%d", &n);
	
	for (int i = 5; i <= n; i++)
		if (i % 5 == 0) {
			tong += i;
			tich *= i;
		}
	
	printf("Tong cac so chia het cho 5 tu 1 toi %d la: %d\n", n, tong);
	printf("Tich cac so chia het cho 5 tu 1 toi %d la: %d", n, tich);
	return 0;
}
