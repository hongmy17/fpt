/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int tinhGiaiThua(int so) {
    int giaiThua = 1;

    for (; so > 0; so--)
        giaiThua *= so;

    return giaiThua;
}

int main() {
    int n;
    printf("Moi nhap so muon tinh giai thua: ");
    scanf("%d", &n);
    printf("Giai thua cua %d la: %d\n", n, tinhGiaiThua(n));
    return 0;
}
