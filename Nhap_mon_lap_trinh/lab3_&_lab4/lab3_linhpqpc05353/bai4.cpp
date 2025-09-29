/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>
#include <math.h>
#include <windows.h>

int main()
{
    int so;
    printf("0.thoat\n");
    printf("1.Tinh hoc luc\n");
    printf("2.Tinh phuong trinh bac 1\n");
    printf("3.Tinh phuong trinh bac 2\n");
    printf("4.Tinh tien dien\n");
    printf("Moi nhap chon chuong trinh: ");
    scanf("%d", &so);
    system("cls"); //xoa man hinh

    switch (so)
    {
    case 0 :
        break;

    case 1:
        {
        	float dtb;
			printf("Moi nhap dtb: ");
			scanf("%f", &dtb);
			if (dtb >= 9) printf("Hoc luat xuat sac");
			else if (dtb >= 8) printf("Hoc luc gioi");
			else if (dtb >= 6.5) printf("Hoc luac kha");
			else if (dtb >= 5) printf("Hoc luc trung binh");
			else if (dtb >= 3.5) printf("Hoc luc yeu");
			else printf("Hoc luat kem");
        	break;
		}

    case 2: 
        {
        	int a, b;
			printf("Moi nhap a: ");
			scanf("%d", &a);
			printf("Moi nhap b: ");
			scanf("%d", &b);
			
			if (a == 0) {
				if (b == 0) printf("Phuong trinh co vo so nghiem");
				else printf("Phuong trinh vo nghiem");
			} else printf("Phuong trinh co nghiem x = %g", 1.0 * -b / a);
        	break;
		}

    case 3:
        {
        	int a, b, c;
			printf("Moi nhap a: ");
			scanf("%d", &a);
			printf("Moi nhap b: ");
			scanf("%d", &b);
			printf("Moi nhap c: ");
			scanf("%d", &c);
			
			if (a == 0) {
				if (b == 0) {
					if (c == 0) printf("Phuong trinh co vo so nghiem");
					else printf("Phuong trinh vo nghiem");
				} else printf("Phuong trinh co nghiem x = %g", 1.0 * -c / b);
			} else {
				float delta = b * b - 4 * a * c;
				
				if (delta < 0) printf("Phuong trinh vo nghiem");
				else if (delta == 0) printf("Phuong trinh co nghiem kep x = %g", 1.0 * -b / (2 * a));
				else {
					printf("Phuong trinh co 2 nghiem phan biet:\n");
					printf("x1 = %g\n", (-b + sqrt(delta)) / 2 * a);
					printf("x2 = %g", (-b - sqrt(delta)) / 2 * a);
				}
			}
        	break;
		}

    case 4:
        {
        	float soTien = 0;
			int soDien;
			float bac1 = 1.678;
			float bac2 = 1.734;
			float bac3 = 2.014;
			float bac4 = 2.536;
			float bac5 = 2.834;
			float bac6 = 2.927;
			printf("Moi nhap so dien: ");
			scanf("%d", &soDien);

			if (soDien > 400) {
				printf("So tien bac 1 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac1));
				printf("So tien bac 2 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac2));
				printf("So tien bac 3 (%dkwh) la: %g ngan dong\n", 100, 1.0 * (100 * bac3));
				printf("So tien bac 4 (%dkwh) la: %g ngan dong\n", 100, 1.0 * (100 * bac4));
				printf("So tien bac 5 (%dkwh) la: %g ngan dong\n", 100, 1.0 * (100 * bac5));
				printf("So tien bac 6 (%dkwh) la: %g ngan dong\n", soDien - 400, 1.0 * ((soDien - 400) * bac6));

				soTien = ((soDien - 400) * bac6) +
						(100 * bac5) + (100 * bac4) + (100 * bac3) + (50 * bac2) + (50 * bac1);
			}
			else if (soDien > 300) {
				printf("So tien bac 1 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac1));
				printf("So tien bac 2 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac2));
				printf("So tien bac 3 (%dkwh) la: %g ngan dong\n", 100, 1.0 * (100 * bac3));
				printf("So tien bac 4 (%dkwh) la: %g ngan dong\n", 100, 1.0 * (100 * bac4));
				printf("So tien bac 5 (%dkwh) la: %g ngan dong\n", soDien - 300, 1.0 * ((soDien - 300) * bac5));

				soTien = ((soDien - 300) * bac5) + (100 * bac4) + 
										(100 * bac3) + (50 * bac2) + (50 * bac1);
			} 
			else if (soDien > 200) {
				printf("So tien bac 1 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac1));
				printf("So tien bac 2 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac2));
				printf("So tien bac 3 (%dkwh) la: %g ngan dong\n", 100, 1.0 * (100 * bac3));
				printf("So tien bac 4 (%dkwh) la: %g ngan dong\n", soDien - 200, 1.0 * ((soDien - 200) * bac4));

				soTien = ((soDien - 100) * bac4) + 
										(100 * bac3) + (50 * bac2) + (50 * bac1);
			}
			else if (soDien > 100) {
				printf("So tien bac 1 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac1));
				printf("So tien bac 2 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac2));
				printf("So tien bac 3 (%dkwh) la: %g ngan dong\n", soDien - 100, 1.0 * ((soDien - 100) * bac3));

				soTien = ((soDien - 100) * bac3) + (50 * bac2) + (50 * bac1);
			} 
			else if (soDien > 50) {
				printf("So tien bac 1 (%dkwh) la: %g ngan dong\n", 50, 1.0 * (50 * bac1));
				printf("So tien bac 2 (%dkwh) la: %g ngan dong\n", soDien - 50, 1.0 * ((soDien - 50) * bac2));

				soTien = 	((soDien - 50) * bac2) + (50 * bac1);
			}
			else if (soDien > 0) {
				printf("So tien bac 1 (%dkwh) la: %g ngan dong\n", soDien, 1.0 * (soDien* bac1));
				soTien = soDien * bac1;
			} 
			
			printf("So tien dien cua %d kw dien la: %g ngan dong.\n", soDien, soTien);
        	break;
		}
    
    default:
        printf("Nhap sai");
        break;
    }

    return 0;
}
