#include <stdio.h>
int main() {
	int cd, cr;
	printf("Nhap cd: ");
	scanf("%d", &cd);
	printf("Nhap cr: ");
	scanf("%d", &cr);
	
	for (int i = 1; i <= cd; i++) {
		for (int j = 1; j <= cr; j++) {
			if (i == 1 || i == cd || j == 1 || j == cr) printf(" * ");
			else printf("   ");
		}
		printf("\n");
	} 
	return 0;
}
