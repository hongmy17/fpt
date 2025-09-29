#include <stdio.h>
int main() {
	int n, tong = 0;
	printf("Moi nhap n: ");
	scanf("%d", &n);
	
	for (int i = 2; i <= n; i++)
		if (i % 2 == 0) tong += i;
		
	printf("Tong cac so chia het cho 2 tu 1 toi %d la: %d", n, tong);
	return 0;
}
