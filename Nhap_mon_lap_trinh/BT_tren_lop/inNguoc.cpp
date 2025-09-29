#include <stdio.h>
int main() {
	int n;
	printf("Moi nhap n: ");
	scanf("%d", &n);
	
	for (int i = n; i > 0; i--)
		printf("%d ", i);
	return 0;
}
