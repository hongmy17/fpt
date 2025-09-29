/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
int main() {
    int min, max, quantity = 0, so, tb;
    printf("Moi nhap min: ");
    scanf("%d", &min);
    printf("Moi nhap max: ");
    scanf("%d", &max);
    so = min;

    while (min <= max)
    {
        if (min % 2 == 0) {
            quantity++;
            tb += min;
        }
        min++;
    }
    
    printf("Trung binh cac so chia het cho 2 tu %d --> %d la: %g\n", so, max, 1.0 * tb / quantity);
    return 0;
}
