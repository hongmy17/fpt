/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <windows.h>
#include <stdlib.h>

int main() {
    int so;
    
    do {
    	system("cls");
    	printf("++----------------------------------------------------------------++\n");
		printf("|1. Tinh trung binh tong cac so tu nhien chia het cho 2            |\n");
		printf("|2. Chuong trinh xac dinh so nguyen to                             |\n");
		printf("|3. Chuong trinh so chinh phuong                                   |\n");
		printf("|4. Thoat menu                                                     |\n");
		printf("++----------------------------------------------------------------++\n");
		printf("Xin moi chon chuc nang (1, 2, 3, 4): ");
		scanf("%d", &so);
	} while (so <= 0 || so > 4);
    
    switch (so)
    {
    case 1:
        {
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
		    break;
		}
    
    case 2:
        {
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
		    break;
		}

    case 3:
        {
        	int so, i = 2, check = 0;
			printf("Moi nhap so: ");
			scanf("%d", &so);
			
			while (i <= so) 
			{
				if (so == i * i) {
					check = 1;
					break;
				}
				i++;
			}
			
			if (check == 1) {
				printf("%d la so chinh phuong", so);
			} else {
				printf("%d khong phai la so chinh phuong", so);
			}
			break;
		}
    
    case 4: exit(0);
        break;
    }
    return 0;
}
