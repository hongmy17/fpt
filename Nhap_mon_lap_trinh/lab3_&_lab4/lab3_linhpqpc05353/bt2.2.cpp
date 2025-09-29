/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <math.h>
int main() {
	int a, b, c;
	printf("Moi nhap a: ");
	scanf("%d", &a);
	printf("Moi nhap b: ");
	scanf("%d", &b);
	printf("Moi nhap c: ");
	scanf("%d", &c);
	
	if (a == 0) {
		if (b == 0) {
			if (c == 0) printf("Phuong trinh co vo so nghiem");
			else printf("Phuong trinh vo nghiem");
		} else printf("Phuong trinh co nghiem x = %g", 1.0 * -c / b);
	} else {
		float delta = b * b - 4 * a * c;
		
		if (delta < 0) printf("Phuong trinh vo nghiem");
		else if (delta == 0) printf("Phuong trinh co nghiem kep x = %g", 1.0 * -b / (2 * a));
		else {
			printf("Phuong trinh co 2 nghiem phan biet:\n");
			printf("x1 = %g\n", (-b + sqrt(delta)) / 2 * a);
			printf("x2 = %g", (-b - sqrt(delta)) / 2 * a);
		}
	}
	return 0;
}
