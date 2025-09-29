/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int main() {
    int so, i, soNguyenTo = 0;
    printf("Moi nhap so: ");
    scanf("%d", &so);
    
    for (i = 2; i < so; i++) {
        if (so % i == 0) {
            soNguyenTo++;
            break;
        }
    }
    
    if (soNguyenTo == 0) printf("%d la so nguyen to\n", so);
    else printf("%d khong phai so nguyen to\n", so);
    return 0;
} 
