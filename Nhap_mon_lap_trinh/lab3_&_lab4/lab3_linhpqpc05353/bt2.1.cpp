/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main() {
	int a, b;
	printf("Moi nhap a: ");
	scanf("%d", &a);
	printf("Moi nhap b: ");
	scanf("%d", &b);
	
	if (a == 0) {
		if (b == 0) printf("Phuong trinh co vo so nghiem");
		else printf("Phuong trinh vo nghiem");
	} else printf("Phuong trinh co nghiem x = %g", 1.0 * -b / a);
	return 0;
}
