/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int max(int a, int b) {
    if (a > b) return a;
    else return b;
}

int main() {
    int a, b;
    printf("Moi nhap so a: ");
    scanf("%d", &a);
    printf("Moi nhap so b: ");
    scanf("%d", &b);
    printf("So lon nhat trong 2 so %d va %d la: %d\n", a, b, max(a, b));
    return 0;
}
