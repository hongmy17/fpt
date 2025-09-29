/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

void kiemTraSoNguyenTo(int n) {
    int soNguyenTo = 0;

    for (int i = 2; i < n; i++) 
        if (n % i == 0) {
            soNguyenTo = 1;
            break;
        }

    if (soNguyenTo == 1) printf("%d khong phai so nguyen to\n", n);
    else printf("%d la so nguyen to\n", n);
}

int main() {
    int n;
    printf("Moi nhap n: ");
    scanf("%d", &n);
    kiemTraSoNguyenTo(n);
    return 0;
}
