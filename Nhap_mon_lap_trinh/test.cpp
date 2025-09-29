#include<stdio.h>

int main(){
	int x, y, tong = 0;
	printf("Moi nhap x: ");
	scanf("%d", &x);
	printf("Moi nhap y: ");
	scanf("%d", &y);

	for (int i = x; i <= y; i++) {
		tong += i;
	}

    return 0;
}