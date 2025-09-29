#include <stdio.h>
#include <math.h>

void tinhTongTheoCongThuc1(int number) {
    float mauSo = 0;
    int tuSo = 1;
    float kq = 0;

    for (int i = 1; i <= number; i++) {
        mauSo += pow(i, 2);

        if (i % 2 != 0) kq += tuSo / mauSo;
        else kq -= tuSo / mauSo;
    }

    printf("\nKet qua cua cong thuc 1 la: %f\n", kq);
}

void tinhTongTheoCongThuc2(int number) {
	int giaiThua = 1, kq  = 0;
	
	for (int i = 1; i <= number; i++) {
		giaiThua *= i;
		
		if (i % 2 != 0) kq += giaiThua;
		else kq -= giaiThua;
	}
	
	printf("\nKet qua cua cong thuc 2 la: %d\n", kq);
}

void tinhTongTheoCongThuc3(int number) {
	int giaiThua = 1;
	float tuSo, kq = 0;
	
	for (int i = 1; i <= number; i++) {
		tuSo = pow(2, i);
		giaiThua *= i;
		
		if (i % 2 != 0) kq += tuSo / giaiThua;
		else kq -= tuSo / giaiThua;
	}
	
	printf("\nKet qua cua cong thuc 3 la: %f\n", 1 - kq);
}

void tinhTongTheoCongThuc4(int number) {
	float mauSo = 0;
    int tuSo = 1;
    float kq = 0;

    for (int i = 1; i <= number; i++) {
        mauSo += pow(i, 2);

        kq += tuSo / mauSo;
    }

    printf("\nKet qua cua cong thuc 4 la: %f\n", kq);
}

void tinhTongTheoCongThuc5(int number) {
	int diem = 1;
	float kq = 0, tuSo = 1;
	
	for (int i = 2; i <= 2 * number; i += 2) {
		if (diem % 2 != 0) kq += tuSo / i;
		else kq -= tuSo / i;
		
		diem++;
	}	
	
	printf("\nKet qua cua cong thuc 5 la: %f\n", kq);
}

void tinhTongTheoCongThuc6(int number) {
	int mauSo = 0;
	float tuSo = 1, kq = 0;
	
	for (int i = 1; i <= number; i++) {
		mauSo += i;
		
		if (i % 2 != 0) kq += tuSo / mauSo;
		else kq -= tuSo / mauSo;
	}
	
	printf("\nKet qua cua cong thuc 6 la: %f\n", kq);
}

void tinhTongTheoCongThuc7(int number) {
	int giaiThua = 1;
	float tuSo, kq = 0;
	
	for (int i = 1; i <= number; i++) {
		giaiThua *= i;
		tuSo = pow(2, i);
		kq += tuSo / giaiThua; 
	}
	
	printf("\nKet qua cua cong thuc 7 la: %f\n", 1 + kq);
}

void tinhTongTheoCongThuc8(int number) {
	int giaiThua = 1;
	float tuSo = 1, kq = 0;
	
	for (int i = 1; i <= number; i++) {
		giaiThua *= i;
		
		if (i % 2 != 0) kq += tuSo / giaiThua;
		else kq -= tuSo / giaiThua;
	}
	
	printf("\nKet qua cua cong thuc 8 la: %f\n", kq);
}

int main() {
    int n;
    printf("Moi nhap so n: ");
    scanf("%d", &n);

    tinhTongTheoCongThuc1(n);
    tinhTongTheoCongThuc2(n);
    tinhTongTheoCongThuc3(n);
    tinhTongTheoCongThuc4(n);
    tinhTongTheoCongThuc5(n);
    tinhTongTheoCongThuc6(n);
    tinhTongTheoCongThuc7(n);
    tinhTongTheoCongThuc8(n);
    return 0;
}
