#include <stdio.h>
int main() {
	// cuu chuong 7
	int i = 1;
	while (i <= 10) {
		printf("7 x %d = %d\n", i, i * 7);
		i++;
	}
	
	//trung binh cac so chia het cho 3 tu 1 den 20
	int tong = 0, dem = 0;
	i = 1;
	
	while (i <= 20) {
		if (i % 3 != 0) {
			tong += i;
			dem++;
		}
		i++;
	}
	
	printf("Trung binh tong cac so khong chia het cho 3 tu 1 den 20 la: %g", 1.0 * tong / dem);
	return 0;
}
