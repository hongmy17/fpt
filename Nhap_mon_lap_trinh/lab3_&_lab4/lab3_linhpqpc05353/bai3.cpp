/*
	Pham Quang Linh
	MSSV: PC05353
*/
#include <stdio.h>

int main() {
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
    return 0;
}
