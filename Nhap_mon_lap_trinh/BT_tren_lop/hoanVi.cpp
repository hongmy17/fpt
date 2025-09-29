#include <stdio.h>
 
void hoanVi(int *a, int *b) {
	int temp = *a;
	*a = *b;
	*b = temp;
}
 
int main() {
	int a = 100, b = 200;
	
	printf("Truoc hoan doi gia tri cua a la: %d\n", a);
	printf("Truoc hoan doi gia tri cua b la: %d\n", b);
	
	hoanVi(&a, &b);
	
	printf("Sau hoan doi gia tri cua a la: %d\n", a);
	printf("Sau hoan doi gia tri cua b la: %d\n", b);
	return 0;
}
