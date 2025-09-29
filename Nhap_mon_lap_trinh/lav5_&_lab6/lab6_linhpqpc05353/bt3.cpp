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
    int a[n];

    for (int i = 0; i < n; i++) {
        printf("Moi nhap phan tu thu %d: ", i + 1);
        scanf("%d", &a[i]);
    }

    printf("\nMang truoc khi sap xep:\n");
    for (int i = 0; i < n; i++)
        printf("%d ", a[i]);

    for (int i = 0; i < n; i++)  {
        for (int j = 0; j < n; j++) {
            if (a[i] > a[j]) {
                int temp = a[i];
                a[i] = a[j];
                a[j] = temp;
            }
        }
    }

    printf("\n\nMang sau khi sap xep:\n");
    for (int i = 0; i < n; i++)
        printf("%d ", a[i]);
    
    return 0;
}
