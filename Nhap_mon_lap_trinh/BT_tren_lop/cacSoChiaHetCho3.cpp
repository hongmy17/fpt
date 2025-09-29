#include <stdio.h>

int main() {
	int n, tong = 0;
	printf("Moi nhap n: ");
	scanf("%d", &n);
	
	printf("Cac so chia het cho 3 tu 1 toi %d la:", n);
	for (int i = 3; i <= n; i++)
		if (i % 3 == 0) {
			printf(" %d", i);
			tong += i * i;
		}
	
	printf("\nTong binh phuong cua cac so chia het cho 3 tu 1 den %d la: %d", n, tong);
	return 0;
}
