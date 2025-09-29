#include <stdio.h>
int main() {
	int a;
	
	do {
		printf("Moi nhap a: ");
		scanf("%d", &a);
	} while (a < 0 || a > 9);
	
	printf("So vua nhap la: %d", a);
	return 0;
}
