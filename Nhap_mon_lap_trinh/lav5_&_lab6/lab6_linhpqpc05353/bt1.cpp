/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int main()
{
    int n;
    printf("Moi nhap so phan tu cua mang: ");
    scanf("%d", &n);
    int a[n], tong = 0, soLuong = 0;

    for (int i = 0; i < n; i++)
    {
        printf("Moi nhap phan tu thu %d: ", i + 1);
        scanf("%d", &a[i]);

        if (a[i] % 3 == 0) {
            soLuong++;
            tong += a[i];
        }
    }
    
    if (soLuong > 0)
    	printf("Trung binh tong cac gia tri chia het cho 3 la: %g\n", 1.0 * tong / soLuong);
    else printf("Khong co gia tri chia het cho 3");
    
    return 0;
}
