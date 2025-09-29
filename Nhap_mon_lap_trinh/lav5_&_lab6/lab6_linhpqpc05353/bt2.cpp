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
    int a[n], min, max = 0;

    for (int i = 0; i < n; i++) {
        printf("Moi nhap phan tu thu %d: ", i + 1);
        scanf("%d", &a[i]);
    }

    for (int i = 0; i < n; i++)
		if (a[i] > max)
			max = a[i];
			
    min = max;
    for (int i = 0; i < n; i++)
    	if (a[i] < min)
    		min = a[i];
    
    printf("Gia tri lon nhat trong mang la: %d\n", max);
    printf("Gia tri nho nhat trong mang la: %d\n", min);
    return 0;
}
