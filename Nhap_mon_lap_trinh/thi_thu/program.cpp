#include<stdio.h>
#include<windows.h>
#include<string>
struct sinhvien{
	char ten[40];
	float diem; 
	}mangsv[100]; 
int main(){
	system("cls"); 
	int ck,bien=0,j,tem;  
	char tt; 
	system("cls");
	printf("-----------------------------MENU-------------------------------");
	printf("\n                 1.Thong tin gia dinh                           ");
	printf("\n                 2.So chia het cho 5                            ");
	printf("\n                 3.Thong tin sinh vien thi lap trinh            ");
	printf("\n                 0.Thoat                                        ");
	printf("\n----------------------------------------------------------------"); 
	do{
		printf("\nXin moi chon chuc nang: ");
	    scanf("%d",&ck);
	    if(ck>3||ck<0){
	    	printf("\nBan au roi nhap lai\nNhap sai nua da chet me"); 
		} 
	}while(ck>3||ck<0); 
	switch(ck){
		case 1:
		system("cls"); 
		printf("=========Chao mung den chuc nang 1===========");
		int tuoibo,tuoime;
		char tenbo[90],tenme[90];
		printf("\nXin nhap ten cua bo: ");
		fflush(stdin); 
		gets(tenbo);
		printf("\nXin nhap tuoi cua bo: ");
		fflush(stdin); 
		scanf("%d",&tuoibo);
		printf("\nXin nhap ten cua me: ");
		fflush(stdin); 
		gets(tenme);
		printf("\nXin nhap tuoi cua me: ");
		fflush(stdin); 
		scanf("%d",&tuoime);
		printf("\nTen cua bo la: %s \ntuoi bo %d",tenbo,tuoibo);
		printf("\nTen cua me la: %s \ntuoi me %d",tenme,tuoime); 
		break; 
		case 2:
		system("cls"); 
		printf("===========Chao mung den chuc nang 2============");
		int n,i;
		printf("\nXin moi nhap n:");
		scanf("%d",&n);
		printf("\nCac so chia het cho 5 la:");
		for(i=0;i<=n;i++){
			if(i%5==0){
				printf("%d;",i); 
			} 
		}
		break; 
		case 3:
		system("cls"); 
		printf("==========Chao mung den chuc nang so 3==========");
		printf("\n+++++++++++Thong tin sinh vien thi lap trinh+++++++++++++");
		printf("\nXin nhap so luong sinh vien: ");
		scanf("%d",&n); 
		for(i=0;i<n;i++){
			printf("\nXin moi nhap ten sinh vien thu %d: ",i+1);
			fflush(stdin); 
			gets(mangsv[i].ten);
			printf("\nXin moi nhap diem cua sinh vien thu %d: ",i+1);
			fflush(stdin); 
			scanf("%f",&mangsv[i].diem); 
		}
		printf("\nSo luong sinh vien thi lap trinh la:%d",n);
		for(i=0;i<n;i++){
			printf("\n=#=#=#=#Thong tin sinh vien thu %d=#=#=#=#=",i+1);
			printf("\nTen:%s",mangsv[i].ten);
			printf("\nDiem:%.1f",mangsv[i].diem); 
		} 
		for(i=0;i<n;i++){
			if(mangsv[i].diem>=5){
				bien+=1; 
			} 
		}
		printf("\nSo luong sinh vien thi dau la :%d\n",bien);
		tem = 0;
		for(i=0;i<n;i++)
			if (mangsv[i].diem > tem)
				tem = i;
				
		printf("Sinh vien co diem thi cao nhat la:\n");
		printf("Ten: %s\n", mangsv[tem].ten);
		printf("Diem: %f\n", mangsv[tem].diem);
		break;
		case 0:
		exit(0); 
	}
	printf("\nBan co muon tiep tuc su dung chuong trinh(y/n): ");
	fflush(stdin); 
	scanf("%c",&tt); 
	if(tt=='y'){
		main(); 
	} 
}
