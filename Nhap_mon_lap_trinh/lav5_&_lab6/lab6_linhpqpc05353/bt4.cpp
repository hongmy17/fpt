/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int main() {
    int hang, cot;
    printf("Moi nhap so hang: ");
    scanf("%d", &hang);
    printf("Moi nhap so cot: ");
    scanf("%d", &cot);
    int a[hang][cot];

    for (int i = 0; i < hang; i++)
        for (int j = 0; j < cot; j++) {
            printf("Moi nhap vao hang thu %d, cot thu %d: ", i + 1,j + 1);
            scanf("%d", &a[i][j]);
        }
        
    printf("\nMang vua nhap la:\n");
    for (int i = 0; i < hang; i++) {
    	for (int j = 0; j < cot; j++)
    		printf("%d\t", a[i][j]);
    	printf("\n");
	}

	printf("\nBinh phuong cua cac phan tu trong mang la:\n");
    for (int i = 0; i < hang; i++) {
        for (int j = 0; j < cot; j++){
        	a[i][j] *= a[i][j];
            printf("%d\t", a[i][j]);
		}
		
        printf("\n");
    }
    return 0;
}
